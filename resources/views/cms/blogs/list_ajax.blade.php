<table class="table table-sm fs--1 mb-0" id="show_table_data">
    <thead>
        <th class="sort align-middle" scope="col"
            data-sort="customer"style="width:20%; min-width:100px;">S.No</th>
        <th class="sort align-middle" scope="col" data-sort="customer"
            style="width:15%; min-width:100px;">Image</th>
        <th class="sort align-middle" scope="col" data-sort="email"
            style="width:20%; min-width:100px;">Title</th>
        <th class="sort align-middle pe-3" style="w" scope="col"
            data-sort="mobile_number" style="width:20%; min-width:100px;">Description</th>
        
            <th class="sort align-middle pe-3" scope="col"
            data-sort="mobile_number" style="width:20%; min-width:100px;text-align:center;">Action</th>
        </tr>
    </thead>
    <tbody class="list" id="table-latest-review-body">

        @foreach ($blog as $key => $item)
        
            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="email align-middle white-space-nowrap"><a
                    class="fw-semi-bold"href="mailto:raymond@example.com">{{ $key+1 }}</a>
                </td>
                <td class="customer align-middle white-space-nowrap">
                    <a
                        class="d-flex align-items-center text-900 text-hover-1000"href="#!">
                        <div class="avatar avatar-m"style=" height: 5rem;width: 5rem;">
                            <img
                                src="{{ url('uploads/blog/'.$item->image) }}"alt="" />
                        </div>
                    </a>
                </td>
                <td
                    class="last_active align-middle  white-space-nowrap text-700 fw-semi-bold">
                    {{ $item->heading }}</td>

                <td class="email align-middle white-space-nowrap"><a
                        class="fw-semi-bold"href="mailto:raymond@example.com">{{ $item->meta_desc }}</a>
                </td>
                <td class="joined align-middle white-space-nowrap text-700 text-center">
                    <button type="button" class="btn btn-sm btn-info"
                        data-bs-target="#blogeditmodel" data-bs-toggle="modal"
                        onclick="blog_edit('{{ $item->id }}')"><i
                            class="far fa-edit"></i></button>
                    @if ($item->flag == 1)
                        <button class="btn btn-sm btn-success" data-bs-target="#deletepopup"
                            data-bs-toggle="modal"
                            onclick="deletepopup('{{ $item->id }}','blogs','activate')"><i
                                class="fas fa-check"></i></button>
                    @else
                        <button class="btn btn-sm btn-warning"
                            data-bs-target="#deletepopup" data-bs-toggle="modal"
                            onclick="deletepopup('{{ $item->id }}','blogs','deactivate')"><i
                                class="fa fa-warning"></i></button>
                    @endif
                    <button class="btn btn-sm  btn-danger" data-bs-target="#deletepopup"
                        data-bs-toggle="modal"
                        onclick="deletepopup('{{ $item->id }}','blogs','delete')"><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach


    </tbody>
</table>