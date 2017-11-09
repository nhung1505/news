<div>
<div class="container alert">
    <div>{{$list_song}}</div>
    <div class="row">
        <div style="overflow: hidden ; height: 300px" class="col-md-12">
            <img width="100%"  src="http://thewallpaper.co/wp-content/uploads/2016/02/seen-on-badchi-minions-the-competition-widescreen-movie-for-kids-hd-1920x1080.jpg">
        </div>
    </div>
    <div class="container">
        <div>
            <table class="table">
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Name Song</td>
                    <td>
                        <sub>
                            <a data-toggle="modal" data-target="#confirmDelete-">
                                <span class="glyphicon glyphicon-remove" ></span>
                            </a>
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="modal fade" id="confirmDelete-" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger text-center">Confim Delete</h4>
                                            </div>
                                            <div class="modal-body text-danger text-center">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger col-md-6" >Yes</button>
                                                <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </sub>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Name Song</td>
                    <td>
                        <sub>
                            <a data-toggle="modal" data-target="#confirmDelete-">
                                <span class="glyphicon glyphicon-remove" ></span>
                            </a>
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="modal fade" id="confirmDelete-" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger text-center">Confim Delete</h4>
                                            </div>
                                            <div class="modal-body text-danger text-center">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger col-md-6" >Yes</button>
                                                <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </sub>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success">Add Song</button>
            </div>
        </div>
        <div class="row">
            <h2 class="col-md-12">Lyric</h2>
            <pre class="col-md-12">Anh yêu Em</pre>
        </div>
    </div>
</div>
</div>