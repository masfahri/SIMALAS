<table class="table table-hover table-striped">
    <tbody>
    @for ($i = 0; $i < count(json_decode($matapelajaran->kd_mapels)); $i++)
    <tr>
      <td><input type="checkbox"></td>
      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
      <td>
          <p class="mailbox-name mb-0 font-size-16 font-weight-600">{{ App\Models\MataPelajaranModel::where('kd_mapel', json_decode($matapelajaran->kd_mapels)[$i])->first()->nama_mapel }}</p>
          <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
      </td>
      <td class="mailbox-attachment"></td>
      <td class="mailbox-date">2:45 PM</td>
    </tr>    
    @endfor
    </tbody>
  </table>