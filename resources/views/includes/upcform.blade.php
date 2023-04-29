<form method="POST" action="{{ route('create.postcards') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <textarea id="post" class="scroll" style="resize: none" name="post" placeholder="Share a post"></textarea>
        
        <div class="post-media">
            <div class="image-upload">
                <input type="file" name="postimage" class="postimage" title="upload an image" />
            </div>
            <div class="video-upload">
                <input type="file" name="postvideo" class="postvideo" title="upload a video" />
            </div>
        </div>

        <button type="submit">Share</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token">
    </div> 
</form> 

