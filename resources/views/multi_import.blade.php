@extends('layouts.app')

@section('content')

<div class="container">
    <style>
        #table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
          }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('success'))
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    </script> 
                    
                    @endif
                    <div class="card-body">
                        <h3>Importing Excel file with <b>Multiple Worksheets (2 sheets here) </b></h3>
                        <hr>
                        <a href="{{URL::to('/')}}/public/sample_files/multiple_sheet_sample.xlsx" target="_blank"> 
                            <button class="btn btn-sm btn-primary">
                            Download Sample File</button>
                        </a>
                        <hr>
                        <form action="{{ route('multi_import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            @if($errors->has('file'))
                                <div class="error">{{ $errors->first('file') }}</div>
                            @endif
                            <br>
                            <button class="btn btn-info">Multiple Sheet Import</button>
                            <a class="btn btn-success" href="{{ url('/home') }}">Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('truncate_students') }}">Truncate Students</a>
                        <hr>
                        <?php 
                            $students = DB::table('students')->orderBy('id','desc')->paginate(5);
                        ?>
                        <div>
                        <table style="width:100%;border: 1px solid black;margin-top:10px;">
                            <tr style="border: 1px solid black;text-align:center">
                                <th style="border: 1px solid black;">ID</th>
                                <th style="border: 1px solid black;">Roll No</th>
                                <th style="border: 1px solid black;">Name</th> 
                            </tr>
                            @foreach ($students as $student)
                            <tr style="border: 1px solid black;text-align:center">
                                <td style="border: 1px solid black;">{{ $student->id }}</td>
                                <td style="border: 1px solid black;">{{ $student->roll_no }}</td>
                                <td style="border: 1px solid black;">{{ $student->name }}</td>
                            </tr>
                            @endforeach                         
                        </table>
                        </div>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('truncate_products') }}">Truncate Products</a>
                        <hr>
                        <?php 
                            $products = DB::table('products')->orderBy('id','desc')->paginate(5);
                        ?>
                        <div>
                        <table style="width:100%;border: 1px solid black;margin-top:10px;">
                            <tr style="border: 1px solid black;text-align:center">
                                <th style="border: 1px solid black;">ID</th>
                                <th style="border: 1px solid black;">Name</th> 
                            </tr>
                            @foreach ($products as $product)
                            <tr style="border: 1px solid black;text-align:center">
                                <td style="border: 1px solid black;">{{ $product->id }}</td>
                                <td style="border: 1px solid black;">{{ $product->name }}</td>
                            </tr>
                            @endforeach                         
                        </table>
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
