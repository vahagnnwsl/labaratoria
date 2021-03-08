
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">

<div class="card card-info p-2" data-select2-id="32">
    <div class="card-header">
        <h3 class="card-title">Filter</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="display: block;" data-select2-id="31">
        <form method="GET" action="{{url(request()->path())}}">
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Flight date:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="flight_date">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date and time of sample collection:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="flight_date">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date and time of result report	:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="flight_date">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Flight:</label>

                        <input type="text" class="form-control"  name="flight">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Full name:</label>

                        <input type="text" class="form-control"  name="full_name">

                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-search"></i> </button>
                </div>
            </div>
        </form>

    </div>
</div>

@push('js')
    <script src="/plugins/moment/moment.min.js"></script>

    <script src="/plugins/daterangepicker/daterangepicker.js"></script>

    <script>
        $('#reservation').daterangepicker()

    </script>
@endpush
