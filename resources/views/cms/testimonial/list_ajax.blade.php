 <table class="table table-sm fs--1 mb-0" id="show_table_data">
    <thead>
        <th style="width:6%; min-width:100px;">S.No</th>
        <th class="sort align-middle" scope="col"
            data-sort="customer"style="width:20%; min-width:100px;">Image</th>
        <th class="sort align-middle" scope="col" data-sort="customer"
            style="width:15%; min-width:100px;">Title</th>
        <th class="sort align-middle" scope="col" data-sort="email"
            style="width:10%; min-width:100px;">Position</th>
        
            <th style="width:6%; min-width:100px;">Status</th>
        <th class="sort align-middle text-center pe-0" scope="col"
            style="width:20%; min-width:200px;">ACTION</th>
        </tr>
    </thead>
    <tbody class="list" id="table-latest-review-body">

        @foreach ($testimonial as $key => $item)
            <tr class="hover-actions-trigger btn-reveal-trigger position-static mb-5">
                <td>{{$key+1}}</td>
                <td class="customer align-middle white-space-nowrap">
                    <a
                        class="d-flex align-items-center text-900 text-hover-1000"href="#!">
                        <div class="avatar avatar-m"style=" height: 5rem;width: 10rem;">
                            <img
                                src="{{ url('uploads/testimonial/' . $item->image) }}"alt="" />
                        </div>
                    </a>
                </td>
                <td
                    class="last_active align-middle  white-space-nowrap text-700 fw-semi-bold">
                    {{ $item->name }}</td>

                <td class="email align-middle white-space-nowrap"><a
                        class="fw-semi-bold"href="mailto:raymond@example.com">{{ $item->designation }}</a>
                </td>
                @if($item->flag == 0)
                <td class="email align-middle white-space-nowrap"><span class="badge bg-success">{{ 'Active'}} </span></td>
                @elseif($item->flag == 1)
                <td class="email align-middle white-space-nowrap"><span class="badge bg-danger">{{ 'Inactive'}} </span></td>
                @endif
              
                <td class="joined align-middle white-space-nowrap text-700 text-center">
                    <button type="button" class="btn btn-sm btn-info"
                        data-bs-target="#slidermodel" data-bs-toggle="modal"
                        onclick="testimonial_edit('{{ $item->id }}')"><i
                            class="far fa-edit"></i></button>
                    @if ($item->flag == 1)
                        <button class="btn btn-sm btn-success" data-bs-target="#deletepopup"
                            data-bs-toggle="modal"
                            onclick="deletepopup('{{ $item->id }}','testimonial','activate')"><i
                                class="fas fa-check"></i></button>
                    @else
                        <button class="btn btn-sm btn-warning"
                            data-bs-target="#deletepopup" data-bs-toggle="modal"
                            onclick="deletepopup('{{ $item->id }}','testimonial','deactivate')"><i
                                class="fa fa-warning"></i></button>
                    @endif
                    <button class="btn btn-sm  btn-danger" data-bs-target="#deletepopup"
                        data-bs-toggle="modal"
                        onclick="deletepopup('{{ $item->id }}','testimonial','delete')"><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach


    </tbody>
</table>

