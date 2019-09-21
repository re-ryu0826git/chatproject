@extends('layouts.comment')

@section('title', 'チャット投稿')

@section('content')
    <div class="container">
        <div class="row">
            <h2>チャット投稿</h2>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>{{ $group->name }}</h5>
                <label>メンバー:</label>
                @foreach($group->users as $user)
                <h7>{{ $user->name }}</h7>
                @endforeach
            </div>
            
            <!-- chatbody -->
            <div class="card-body chatbody">
                @foreach($group->comments as $comment)
                    {{-- ログインID と コメントIDが等しいとき右側にコメントを表示 --}}
                    @if (empty($comment->comment)) 
                        <p>コメントの投稿はまだありません</p>
                    @else
                        @if ($comment->user_id == Auth::user()->id)
                            <!--右からの吹き出し-->
                            <div class="balloon think">
                                <figure class="balloon-image-right">
                                    <i class="fas fa-user my-skyblue fa-3x fa-border"></i>
                                <figcaption class="balloon-image-description-right">
                                    {{ Auth::user()->name }}
                                </figcaption>
                                </figure>
                                <div class="balloon-text-left">
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @else
                            <!--左からの吹き出し-->
                            <div class="balloon think">
                             <figure class="balloon-image-left">
                               <i class="fas fa-user fa-3x fa-border"></i>
                             <figcaption class="balloon-image-description">
                                 <!--他のユーザ名前にする必要がある-->
                                 {{ $comment->user->name }}
                             </figcaption>
                             </figure>
                             <div class="balloon-text-right">
                               <p>
                                 {{ $comment->comment }}
                               </p>
                             </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            
            <div class="card-footer">
                <form action="{{ action('CommentController@create',$group->id) }}" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                            <input type="submit" class="btn btn-info" value="Send">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
@endsection