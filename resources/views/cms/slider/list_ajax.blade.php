<table class="table table-sm fs--1 mb-0" id="show_table_data">
    <thead>
        <th style="width:6%; min-width:100px;">S.No</th>
        <th class="sort align-middle" scope="col"
            data-sort="customer"style="width:20%; min-width:100px;">Image</th>
        <th class="sort align-middle" scope="col" data-sort="customer"
            style="width:15%; min-width:100px;">Title</th>
        <th class="sort align-middle" scope="col" data-sort="email"
            style="width:10%; min-width:100px;">Url</th>
        {{-- <th class="sort align-middle pe-3" style="w" scope="col"
            data-sort="mobile_number" style="width:20%; min-width:100px;">MOBILE NUMBER</th>
        <th class="sort align-middle text-end" scope="col"
            data-sort="last_active"style="width:20%; min-width:100px;">COMPANY NAME</th>
        <th class="sort align-middle text-end pe-0" scope="col" data-sort="address"
            style="width:20%; min-width:100px;"> ADDRESS</th>
        <th class="sort align-middle text-end pe-0" scope="col" data-sort="gst"
            style="width:20%; min-width:200px;"> GST NUMBER</th> --}}
            <th style="width:6%; min-width:100px;">Status</th>
        <th class="sort align-middle text-center pe-0" scope="col"
            style="width:20%; min-width:200px;">ACTION</th>
        </tr>
    </thead>
    <tbody class="list" id="table-latest-review-body">

        @foreach ($banner as $key => $item)
            <tr class="hover-actions-trigger btn-reveal-trigger position-static mb-5">
                <td>{{$key+1}}</td>
                <td class="customer align-middle white-space-nowrap">
                    <a
                        class="d-flex align-items-center text-900 text-hover-1000"href="#!">
                        <div class="avatar avatar-m"style=" height: 7rem;width: 15rem;">
                            <img
                                src="{{ url('uploads/sliders/' . $item->image) }}"alt="" />
                        </div>
                    </a>
                </td>
                <td
                    class="last_active align-middle  white-space-nowrap text-700 fw-semi-bold">
                    {{ $item->title }}</td>

                <td class="email align-middle white-space-nowrap"><a
                        class="fw-semi-bold"href="mailto:raymond@example.com">{{ $item->url }}</a>
                </td>
                @if($item->flag == 0)
                <td class="email align-middle white-space-nowrap"><span class="badge bg-success">{{ 'Active'}} </span></td>
                @elseif($item->flag == 1)
                <td class="email align-middle white-space-nowrap"><span class="badge bg-danger">{{ 'Inactive'}} </span></td>
                @endif
                {{-- <td class="mobile_number align-middle white-space-nowrap"><a
                        class="fw-bold text-1100">{{ $item->vendor_mobile }}</a></td>

                <td class="last_active align-middle text-end white-space-nowrap text-700">
                    {{ $item->company_name }}</td>
                <td class="joined align-middle white-space-nowrap text-700 text-end">
                    {{ $item->company_address }}</td>
                <td class="joined align-middle white-space-nowrap text-700 text-end">
                    {{ $item->company_gst }}</td> --}}
                <td class="joined align-middle white-space-nowrap text-700 text-center">
                    <button type="button" class="btn btn-sm btn-info"
                        data-bs-target="#slidermodel" data-bs-toggle="modal"
                        onclick="slider_edit('{{ $item->id }}')"><i
                            class="far fa-edit"></i></button>
                    @if ($item->flag == 1)
                        <button class="btn btn-sm btn-success" data-bs-target="#deletepopup"
                            data-bs-toggle="modal"
                            onclick="deletepopup('{{ $item->id }}','banners','activate')"><i
                                class="fas fa-check"></i></button>
                    @else
                        <button class="btn btn-sm btn-warning"
                            data-bs-target="#deletepopup" data-bs-toggle="modal"
                            onclick="deletepopup('{{ $item->id }}','banners','deactivate')"><i
                                class="fa fa-warning"></i></button>
                    @endif
                    <button class="btn btn-sm  btn-danger" data-bs-target="#deletepopup"
                        data-bs-toggle="modal"
                        onclick="deletepopup('{{ $item->id }}','banners','delete')"><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach


    </tbody>
</table>
