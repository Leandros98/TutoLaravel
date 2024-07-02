<x-mail::message>
# Nouvel demande de contact

une nouvelle demande de contact a ete fait pour le bien 
<a href="{{route('properti.show',['slug'=>$property->getSlug(), 'property'=>$property])}}">{{$property->title}}</a>
-prenom: {{$data['firstName']}}
-Nom: {{$data['lastName']}}
-Telephone: {{$data['phone']}}
-Email: {{$data['email']}}
** Message:** <br>
{{$data['message']}}

</x-mail::message>
