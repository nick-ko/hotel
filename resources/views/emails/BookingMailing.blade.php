@component('mail::message')
    # Royal Hotel

    Bonjour Mr/Mme {{ $book_name }} votre reservation a ete prise en compte avec succes.
    Veuillez nous confirmer votre presence par appel telephonique ou par email.
    Merci et aggreable journée a vous.


    Date d'arriver : {{ $book_from }}
    Date de depart : {{ $book_to }}
    Montant Total du sejour : {{ $booking_price }} FCFA

    Cordialement,
    L'equipe Royal Hotel
    Contact : 00 00 00 00
    Email : royalhotel@gmail.com

@endcomponent

