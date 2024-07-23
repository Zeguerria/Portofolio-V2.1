{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}
@component('mail::message')
# Nouveau message de contact

**Nom :** {{ $contact->nom }}  
**Prénom :** {{ $contact->prenom }}  
**Email :** {{ $contact->email }}  
**Phone :** {{ $contact->phone }}  
**Message :**  
{{ $contact->message }}

@endcomponent

