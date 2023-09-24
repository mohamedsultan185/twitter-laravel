@extends('layouts.app')
@section('content')
    <div id="app">
          <example-component :cols="6" :rows="10":users="{{ json_encode($users)}}"></example-component>
            </div>
@endsection

@push('scripts')
    @vite('resources/js/app.js')    
@endpush
<style scoped>
    *,
*:before,
*:after {
  box-sizing: border-box;
  font-family: sans-serif;
  background-color:rgb(52, 54, 53)
}

#table {
    width: min(100%, 800px);
    margin: 0 auto;
}

table {
    width: 100%;
    display: table;
    border: 1px solid #666;
    table-layout: fixed;
    border-collapse: collapse;
     font-weight: bold;

}

tr {
    display: table-row;
    width: 100%;

    &>th {
        width: 30px;
    }
}

td {
    display: table-cell;
    border-top: 1px solid #666;
    height: 30px;
    padding: 0;

    &+td {
        border-left: 1px solid #666;
    }

    & input[type="text"] {
        width: 100%;
        height: 100%;
        background: rgba(#55f, 0.1);
        padding-inline: 8px;
        border: none;
        outline: 2px solid #55f;
    }

    & div {
        width: 100%;
        height: 100%;
        padding: 8px;
        cursor: text;
    }
}
</style>

