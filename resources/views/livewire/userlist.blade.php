@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->category }}</td>
                    <td>{{ $row->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
