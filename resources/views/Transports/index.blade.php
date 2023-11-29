<html>
    <body>
        <div class="container">
            <form 
                method="PUT" 
                action="{{ route('transports.create') }}"
            >
                <div class="form-group">
                    <label>Unit number</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="unit_number" 
                        id="unit_number"
                    >
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="year" 
                        id="year"
                    >
                </div>
                <div class="form-group">
                <label>Note</label>
                <textarea
                    type="text" 
                    class="form-control" 
                    name="notes" 
                    id="notes"
                    >
                </textarea>
                <div>
                <input 
                    type="submit" 
                    name="submit" 
                    value="Submit" 
                    class="btn btn-dark btn-block"
                >
            </form>
        </div>

        <table>
            <th>Unit number</th> 
            <th>Year</th>
            <th>Notes</th> 
            @foreach($trucks as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->unit_number}}</td>
                <td>{{$row->year}}</td>
                <td>{{$row->notes}}</td>
                <td>
                    <a href="{{ route('transports.destroy', $row->id) }}"
                    method="DELETE"
                    >
                    Delete
                </a></td>
            <tr>
            @endforeach
        </table>

        <hr>
        <div class="container">
            <form 
                method="PUT" 
                action="{{ route('transports.create') }}"
            >
                <div class="form-group">
                    <label>Main Truck</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="main_truck" 
                        id="main_truck"
                    >
                </div>
                <div class="form-group">
                    <label>Subunit</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="subunit" 
                        id="subunit"
                    >
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="start_date" 
                        id="start_date"
                    >
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="end_date" 
                        id="end_date"
                    >
                </div>
                <input 
                    type="submit" 
                    name="submit" 
                    value="Submit" 
                    class="btn btn-dark btn-block"
                >
            </form>
        </div>
        <table>
            <th>Main Truck</th> 
            <th>Subunit</th>
            <th>Start Date</th> 
            <th>End Date</th> 
            {{-- @foreach($trucks->truckSubUnits as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->unit_number}}</td>
                <td>{{$row->year}}</td>
                <td>{{$row->notes}}</td>
                <td>
                    <a href="{{ route('transports.destroy', $row->id) }}"
                    >
                    Delete
                </a></td>
            <tr>
            @endforeach --}}
        </table>
    </body>
</html>