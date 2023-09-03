<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Noleggio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller {

    /*
     * Il metodo index consente di accedere alla home dell'utente di livello 2
     */
    public function index() {
        //return della vista della home del cliente
        return view('home');
    }


    /*
     * Il metodo profilo consente di accedere al profilo dedll'utente che si è autenticato ed ha effettuato il login al sito
     */
    public function profilo() {
        //return della vista del profilo del cliente
        return view('profilo');
    }


    /*
     * Il metodo getDatiPersonali consente di estrarre i dati del cliente che ha intenzione di modificare i dati
     * Questo serve per riempire i campi di modifica con i campi precedentemente impostati
     */
    function getDatiPersonali1(){
        //estrazione dello username del cliente
        $username = Auth::user()->username;

        //query di estrazione dell'utente dal database
        $data = User::where('username', $username)->first();

        //return della vista di modifica dei dati, compilando i campi di modifica con i dati vecchi estratti dal DB
        return view('modificaDati', ['dati'=>$data]);
    }


    /*
     * Il metodo updateDatiPersonali permette di andare ad aggiornare effettivamente i dati del cliente, secondo i nuovi input
     */
    function updateDatiPersonali1(Request $request)
    {

        //estrazione dello username del cliente
        $username = Auth::user()->username;

        //validazione dei dati della form di modifica
        $request->validate([
            'nome' => ['required','string','max:20'],
            'cognome' => ['required','string','max:20'],
            'data_nascita' => ['required', 'date_format:Y-m-d'],
            'email' => ['string','email','max:30']
        ]);


        //se il campo password è vuoto i dati vengono aggiornati senza cambiare la password vecchia
        if (!($request->input('password')))
        {
            //query di update delle informazioni dell'utente senza password
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'email'=>$request->input('email')
                ]);
        }
        else
        {
            //se il campo password è pieno, la password viene valida e vengono aggiornati tutti i dati
            $request->validate([
                'password' => ['required','string','min:8']
            ]);

            //query di update delle informazioni dell'utente compresa la password
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'password'=>Hash::make($request->input('password')),
                    'email'=>$request->input('email')
                ]);
        }

        //redirezione alla rotta del profilo dell'utente
        return redirect()->route('user/profilo');
    }


    /*
     * Il metodo noleggioAuto permette ad un cliente che si è autenticato di noleggiare un'auto
     */
    function noleggioAuto($codice_auto, Request $request)
    {
        //query di estrazione dell'auto selezionata (con codice $codice_auto) comprese di informazioni di marca e modello
        $dbQuery = DB:: table('Auto')
            ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where ('codice_auto', $codice_auto)
            ->get();

        //definizione dell'array che conterrà le informazioni da passare alla view
        $cardAuto = Array();

        //inserimento del risultato della query all'interno dell'array
        $cardAuto["cardAuto"] = $dbQuery;

        //estrazione delle date del noleggio richieste da $request per quell'auto
        $noleggio_inizio = $request->input("inizioNoleggio");
        $noleggio_fine = $request->input("fineNoleggio");

        //controllo esattezza delle date inserite
        if($noleggio_fine<$noleggio_inizio) {
            //se le date sono sbaglaite viene stampato un popup di errore e si viene rimandati alla scheda dell'auto che si aveva intenzione di noleggiare
            $popupMessage = "Errore, date non valide!";
            echo "<script>alert('$popupMessage');</script>";

            //ritorno della vista dell'auto singola che si intendeva noleggiare
            return view("autosingola", $cardAuto);
        }else {

            //query di verifica per la disponibilità dell'auto selezionata nelle date specificate
            $noleggio_disponibile = Noleggio::whereBetween('data_inizio', [$noleggio_inizio, $noleggio_fine])
                ->orWhereBetween('data_fine', [$noleggio_inizio, $noleggio_fine])
                ->exists();

            //se il risultato della query è vuoto l'auto non esiste e viene stampato un messaggio di errore
            if ($dbQuery->isEmpty()) {
                //stampa del popup di errore
                $popupMessage = "Auto non trovata!";
                echo "<script>alert('$popupMessage');</script>";

                //ritorno della vista dell'auto singola che si intendeva noleggiare
                return view("autosingola", $cardAuto);
            } else if (! $noleggio_disponibile) {
                //se l'auto è libera in quelle date specificate

                //si crea un oggetto noleggio che verrà poi inserito nel database
                $noleggio = new Noleggio();

                //viene estratto l'id del cliente che è loggato
                $user = Auth::user()->id;

                //vengono settati tutti i campi dell'oggetto che devono essere inseriti nel database
                $noleggio->data_inizio = $noleggio_inizio;
                $noleggio->data_fine = $noleggio_fine;
                $noleggio->auto_ref = $codice_auto;
                $noleggio->utente_ref = $user;
                $noleggio->save();

                //query di estrazione dell'oggetto appena inserito all'interno della tabella noleggio
                $dbQuery = DB:: table('noleggio')
                    ->join("auto", "noleggio.auto_ref", "=", "auto.codice_auto")
                    ->join("modello", "auto.modello_ref", "=", "modello.codice_modello")
                    ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
                    ->where ('auto_ref', $codice_auto)
                    ->where('data_inizio', '=', $noleggio_inizio)
                    ->where('data_fine', '=', $noleggio_fine)
                    ->get();

                //inserimento del risultato della query in un array
                $cardAuto["cardAuto"] = $dbQuery;

                //ritorno della vista di conferma di noleggio con i dati del noleggio
                return view("noleggio", $cardAuto);

            } else {
                //se quell'auto è occupata nel periodo specificato appare un popup di errore
                $popupMessage = "Auto non disponibile!";
                echo "<script>alert('$popupMessage');</script>";

                //ritorno alla vista dell'auto che si voleva noleggiare
                return view("autosingola", $cardAuto);
            }
        }
    }

    /*
     * Il metodo gestioneClienti permette di visualizzare la vista contenente una tabella con tutti i clienti
     */
    function gestioneClienti()
    {
        //si estraggono tutti i clienti, ovvero tutti gli users che hanno come ruolo "user"
        $dbQuery = User::where('users.role', '=', 'user')
            ->get();

        //si ritorna la vista di gestioneClienti contenente tutti i clienti estratti nell'oggetto clienti
        return view('gestioneclienti', ['clienti' => $dbQuery]);
    }

    /*
     * Il metodo eliminaCliente permette di eliminare il cliente che è stto selezionato dalla tabella
     */
    function eliminaCliente($id)
    {
        //trovo il cliente di interesse
        $cliente = User::findOrFail($id);

        //se l'ho trovato
        if($cliente)
        {
            //annullo le chiavi esterne contenute in noleggio se l'utente ha effettivamente noleggiato delle auto
            $noleggi = Noleggio::where('utente_ref', '=', $cliente->id);

            //si esegue l'update dei valori
            $noleggi->update(['utente_ref' => null]);

            //si elimina il cliente trovato
            $cliente->delete();

            //redirezione alla rotta di gestioneClienti con il messaggio di avvenuta eliminazione
            return redirect()->route('gestioneClienti')->with('message', 'Cliente eliminato con successo.');
        }
    }


    function gestioneStaff()
    {
        //si estrae tutto lo staff del sito, ovvero tutti gli users che hanno come ruolo "staff"
        $dbQuery = User::where('users.role', '=', 'staff')
            ->get();

        //si ritorna la vista di gestioneClienti contenente tutti i clienti estratti nell'oggetto clienti
        return view('gestionestaff', ['staff' => $dbQuery]);
    }

    function eliminaStaff($id)
    {
        //trovo il cliente di interesse
        $staff = User::findOrFail($id);

        //se l'ho trovato
        if($staff)
        {
            //si elimina il cliente trovato
            $staff->delete();

            //redirezione alla rotta di gestioneClienti con il messaggio di avvenuta eliminazione
            return redirect()->route('gestionestaff')->with('message', 'Staff eliminato con successo.');
        }
    }
}
