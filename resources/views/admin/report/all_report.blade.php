@extends('admin.admin_master')
@section('title','All Report')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Date</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('search-by-date') }}" method="post">
                            @csrf
                            <div class="row">
                                    <div class="form-group">
                                        <h5>Select Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" id="date" name="date" class="form-control">
                                            @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                               </div>
                            <div class="row">
                                <div class="text-xs-right">
                                    <button type="submit" value="submit" class="btn btn-rounded btn-info">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Month</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('search-by-month') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <h5>Select Month<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="month" id="" class="form-control">
                                            <option value="" disabled selected>---Select a Month---</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Select Year<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year_name" id="" class="form-control">
                                            <option value="" disabled selected>---Select a Year---</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                        </select><br>
                                        <div class="text-xs-right">
                                            <button type="submit" value="submit" class="btn btn-rounded btn-info">Search</button>
                                        </div>
                                        @error('year_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Year</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('search-by-year') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <h5>Select Year<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year" id="" class="form-control">
                                            <option value="" disabled selected>---Select a Year---</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                        </select><br>
                                        <div class="text-xs-right">
                                            <button type="submit" value="submit" class="btn btn-rounded btn-info">Search</button>
                                        </div>
                                        @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection

