@extends('layouts.comment')

@section('title', 'チャット投稿')

@section('content')
    <div class="container">
        <div class="row">
            <h2>チャット投稿</h2>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5>動物</h5>
                <h7>Member : １猫,にー</h7>
            </div>
            
            <!-- chatbody -->
            <div class="card-body chatbody">
                <!--左からの吹き出し-->
                <div class="balloon think">
                 <figure class="balloon-image-left">
                   <i class="fas fa-user fa-3x fa-border"></i>
                 <figcaption class="balloon-image-description">
                     にゃー
                 </figcaption>
                 </figure>
                 <div class="balloon-text-right">
                   <p>
                     にゃー！にゃー！にゃー！にゃー！にゃー！にゃー！にゃー！にゃー！
                   </p>
                 </div>
                </div>
            
                <!--右からの吹き出し-->
                <div class="balloon think">
                 <figure class="balloon-image-right">
                   <i class="fas fa-user fa-3x fa-border"></i>
                 <figcaption class="balloon-image-description">
                     にゃー
                 </figcaption>
                 </figure>
                 <div class="balloon-text-left">
                   <p>
                     にゃー！にゃー！にゃー！にゃー！にゃー！にゃー！にゃー！にゃー！
                   </p>
                 </div>
               </div>
            
            </div>
            
            <div class="card-footer">
                <form action="{{ action('CommentController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                              <input type="text" class="form-control" name="comment">
                            </div>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-info" value="Send">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
@endsection