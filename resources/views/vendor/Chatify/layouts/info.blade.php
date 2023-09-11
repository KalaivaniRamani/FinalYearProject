{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex" style="background-image: url('{{ Auth::user()->picture }}');"></div>
<p class="info-name">{{ Auth::user()->name}}</p>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">shared photos</p>
    <div class="shared-photos-list"></div>
</div>
