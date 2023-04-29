<!-- Edit Modal -->
<div class="modal fade" id="editpostcard{{ $postcard->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h3>
        </div>
        <div class="modal-body postcard">
            <input type="hidden" name="postcard_id" value="">
            <form method="POST" action="{{ route('update.postcard', $postcard->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div>
                    <textarea id="post" class="scroll" style="resize: none;color: #000;border: 0;min-height:150px;" name="post">{{ $postcard->post }}</textarea>
                </div> 

                <div class="modal-foot">
                    {{-- <div class="post-media">
                        @if($postcard->postvideo){
                            <div class="video-upload">
                                <label for="file-input">
                                    <img src="{{ asset('img/video-icon2.png') }}">
                                </label>
                                <input type="file" name="postvideo" title="upload a video" />
                            </div>
                        }@elseif($postcard->postimage){
                            <div class="image-upload">
                                <label for="file-input">
                                    <img src="{{ $postcard->postimage ? asset( 'storage/media/' . $postcard->postimage ) : asset('img/image-icon2.png') }}">
                                </label>
                                <input type="file" name="postimage" title="upload an image" />
                            </div>
                        }
                        @endif                                
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </div>
            </form>  
        </div> 
    </div>
    </div>
</div>

<!-- Comment Modal -->
<div class="modal fade" id="postcardcomments{{ $postcard->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body postcard">
                <div class="fullcol"><div class="modal-close" data-bs-dismiss="modal">x</div></div>
                {{-- Main post --}}
                <div class="pop-comm-left">
                    <a href="{{ route('fanprofile', $postcard->user->first_name) }}">
                    <img src="{{ $postcard->user->profilephoto ? asset( 'storage/media/' . $postcard->user->profilephoto ) : asset('img/iuser.png') }}">
                    </a>
                </div>
                <div class="pop-comm-right">
                    <a href="{{ route('fanprofile', $postcard->user->first_name) }}">
                    <p class="oto"><span>{{ $postcard->user->first_name }} {{ $postcard->user->last_name }}</span> <span class="po-time">{{ $postcard->getTimeAgo($postcard->created_at); }}</span></p>
                    </a>
                    <p class="opo">{{ $postcard->post }}</p>
                </div>
                {{-- Main post ends --}}
                <hr>
                {{-- Comments start --}}
                {{-- @if($postcard->comment) --}}
                @foreach ($postcard->comments as $comment)
                <div class="pop-comm-right" id="po-comment">
                    <div class="pop-comm-box">
                        <div class="pop-comm-left2">
                            <a href="{{ route('fanprofile', $postcard->user->first_name) }}">
                            <img src="{{ $comment->user->profilephoto ? asset( 'storage/media/' . $comment->user->profilephoto ) : asset('img/iuser.png') }}">
                            </a>
                        </div>
                        <div class="pop-comm-right">
                            <a href="{{ route('fanprofile', $comment->user->first_name) }}">
                            <p class="oto"><span>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span> <span class="po-time">{{ $comment->getTimeAgo($comment->created_at); }}</span></p>
                            </a>
                            <p class="opo">{{ $comment->body }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- @endif --}}
                {{-- Comments end --}}
            </div> 
            <p>&nbsp;</p>
        </div>
    </div>
</div>


<!-- Share Modal -->
<div class="modal fade" id="postcardshare{{ $postcard->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body postcard">
                <div class="fullcol"><div class="modal-close" data-bs-dismiss="modal">x</div></div>

                <div class="pop-comm-left">
                    <a href="{{ route('fanprofile', $postcard->user->first_name) }}">
                    <img src="{{ $postcard->user->profilephoto ? asset( 'storage/media/' . $postcard->user->profilephoto ) : asset('img/iuser.png') }}">
                    </a>
                </div>
                <div class="pop-comm-right">
                    <a href="{{ route('fanprofile', $postcard->user->first_name) }}">
                    <p class="oto"><span>{{ $postcard->user->first_name }} {{ $postcard->user->last_name }}</span> <span class="po-time">{{ $postcard->getTimeAgo($postcard->created_at); }}</span></p>
                    </a>
                    <p class="opo">{{ $postcard->post }}</p>
                </div>
                {{-- Main post ends --}}
                <hr>

                    <div id="share-links">
                    <li>Share this:</li> {!! $contents = \Share::currentPage($postcard->post)
                        ->facebook()
                        ->twitter()
                        ->linkedin('Extra linkedin summary can be passed here')
                        ->whatsapp(); !!}
                    </div>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>