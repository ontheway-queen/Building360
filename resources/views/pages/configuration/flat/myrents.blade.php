@extends('home')
@section('content')
    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>My Flats</h3>

                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Flat No</th>
                                    <th>Floor</th>
                                    <th>House No</th>
                                    <th>Road No</th>
                                    <th>Rented To</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $row)
                                    <tr>
                                        <td class="sorting">{{ $loop->index + 1 }}</td>
                                        <td class="sorting">{{ $row->entry_id }}</td>
                                        <td class="sorting">{{ $row->flat_no }}</td>
                                        <td class="sorting">{{ $row->owner_id }}</td>
                                        <td class="sorting">{{ $row->floor_no }}</td>
                                        <td class="sorting">{{ $row->house_no }}</td>
                                        <td class="sorting">{{ $row->road_no }}</td>
                                        <td class="sorting">
                                            <a href="{{ 'flat/' . $row->id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-primary">Edit</a>

                                            <!--                                    <a href="{{ 'billing-items/' . $row->id }}"
                                                                           class="btn btn-sm btn-info">View</a>-->


                                            <button class="btn btn-sm btn-warning"
                                                onclick="deleteItems({{ $row->id }})">Delete</button>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
