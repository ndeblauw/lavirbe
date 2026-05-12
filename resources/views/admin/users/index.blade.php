<x-site-layout>

<h1>Users</h1>
<ul>
    @foreach($users as $user)
        <li>
            {{$user->name}}
            @if($user->is_admin)
                <em>(admin)</em>
            @else
                <a href="{{route('admin.users.make-admin', $user->id)}}">make admin</a>
            @endif
        </li>
    @endforeach
</ul>

</x-site-layout>
