<ul>
@isset($oCoins)
    @foreach($oCoins as $coin)
        <li>{{ $coin['name'] }}</li>
    @endforeach
@endisset
</ul>
{{ $oCoins->links() }}
