@extends('admin.layouts.master')

@section('content')
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Action</th>
        </thead>
        <tbody>

        <tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="action">
                <form action="message/action/read" method="post">
                    <button type="submit" name="read" value="">Read</button>
                </form>
                <form action="message/action/delete" method="post">
                    <button type="submit" name="delete" value="">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
@endsection