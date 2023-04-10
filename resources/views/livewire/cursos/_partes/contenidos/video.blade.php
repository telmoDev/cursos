<div id="view_{{$key}}" class="w-full h-screen flex flex-col justify-center items-center">
<div>
  @php
      $videoContentId = "video-c-$item->id";
  @endphp
  <div class="video mb-10" id="{{ $videoContentId }}" ></div>
  <button @click="scroll('view_{{$key}}')" class="rounded-md p-2 capitalize font-bold text-lg text-white bg-[#5E2880]" >Continuar</button>
</div>
</div>
<script>
  let urlVideo = 'https://vimeo.com/api/oembed.json?url={{$item->recurso}}&width=700'
  fetch(urlVideo)
  .then(res => {
    return  res.json()
  })
  .then(res => {
    let videoId = document.getElementById('{{$videoContentId}}')
    videoId.innerHTML = res.html
  })
</script>
