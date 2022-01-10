<span class="badge badge-dark">
    @if (!isset($meeting->comittee))
        <p>desconocido</p>


    @else




        {!!$meeting->comittee->icon!!}

        {{$meeting->comittee->name}}

        @if(isset($meeting->comittee->subcomittee))
            / {{$meeting->comittee->subcomittee}}
        @endif
    @endif
</span>
