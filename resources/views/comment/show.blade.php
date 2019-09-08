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
                <div class="row">
                    <div class="col-sm-10 mt-1">
                        <div class="<form-group">
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2 mt-1">
                        <button type="button" class="btn btn-info">Send</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection