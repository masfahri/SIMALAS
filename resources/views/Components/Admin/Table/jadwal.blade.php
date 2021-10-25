<table class="table table-hover table-striped">
  <tbody>
      @foreach ($data as $item)
      {{-- @dd() --}}
      <tr>
        <td><input type="checkbox"></td>
        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
        <td>
            <p class="mailbox-name mb-0 font-size-16 font-weight-600">[{{$item->Mapel->MataPelajaran->summon}}] {{ $item->Mapel->MataPelajaran->nama_mapel }}</p>
            <a class="mailbox-subject" href="#"><b>{{ $item->Mapel->Guru->GuruToUser->name }}</b></a>
        </td>
        <td class="mailbox-attachment"></td>
        <td class="mailbox-date">2:45 PM</td>
      </tr>

      @endforeach
  </tbody>
</table>
