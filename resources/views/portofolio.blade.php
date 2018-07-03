@extends("layout")
@section("title","Admin Dashboard | Portofolio")
@section("content")
<h1 class="page-header">Portofolio</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Portofolio Data
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#create-form">Tambah Data</button>
                </div>

                <div class="modal fade" id="create-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Portofolio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('/portofolio')}}" method="POST" enctype="multipart/form-data">

                        <div class="modal-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul" placeholder="e.g Web Portofolio" required />
                                </div>
                                <div class="form-group">
                                    <label>Img</label>
                                    <input type="file" name="img" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <textarea class="form-control" name="link" rows="1" required></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>

                    </div>
                    </div>
                </div>

                <br>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Img</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resource as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->judul}}</td>
                            <td><a href="{{url('/'.$value->img)}}" target="_blank">{{url('/'.$value->img)}}</a></td>
                            <td>{{$value->deskripsi}}</td>
                            <td><a href="{{$value->link}}" target="_blank">{{$value->link}}</a></td>
                            <td><a class="btn btn-warning" href="{{url('/portofolio/'.$value->id_portofolio)}}"><i class="fa fa-pencil"></i></a></td>
                            <td><form method="POST" action="{{url('/portofolio/'.$value->id_portofolio)}}">{{method_field('DELETE')}}{{csrf_field()}}<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
               
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
@section("js")
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

@if(session('sukses'))
swal(
  'Done!',
  '{{session("sukses")}}',
  'success'
)
@elseif(session('gagal'))
swal(
    'Error!',
    '{{session("gagal")}}',
    'error'
)
@endif
</script>
@endsection