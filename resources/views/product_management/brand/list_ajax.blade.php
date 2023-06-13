<table class="table table-sm fs--1 mb-0">
    <thead>
        <tr>
            <th class="sort align-middle" scope="col" data-sort="customer"style="width:20%; min-width:100px;">brand Icon</th>
            <th class="sort align-middle" scope="col" data-sort="customer" style="width:15%; min-width:100px;">NAME</th>
            <th class="sort align-middle" scope="col" data-sort="email" style="width:20%; min-width:100px;">Description</th>
            <th class="sort align-middle pe-3" style="w" scope="col" data-sort="mobile_number" style="width:20%; min-width:100px;">status</th>

            <th class="sort align-middle text-center pe-0" scope="col" >ACTION</th>
        </tr>
    </thead>
    <tbody class="list" id="table-latest-review-body">
        @foreach ($brand as $item)
        
        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                
            <td class="customer align-middle white-space-nowrap">
                <a class="d-flex align-items-center text-900 text-hover-1000"href="#!">
                    <div class="avatar avatar-m"style=" height: 5rem;width: 5rem;" >
                        <img src="{{ url('uploads/brand/'.$item->icon)}}"alt="" />    
                    </div>  
                </a>
            </td>  
            <td class="last_active align-middle  white-space-nowrap text-700 fw-semi-bold">{{$item->name}}</td> 
           
            <td class="email align-middle white-space-nowrap text-right"><a class="fw-semi-bold"href="mailto:raymond@example.com">{{$item->description}}</a></td>
            @if($item->flag == 0)
            <td class="mobile_number align-middle white-space-nowrap text-right" ><a class="fw-bold text-1100" ><span class="badge bg-success">{{'Active'}} </span></a></td>
            @elseif($item->flag == 1)
            <td class="mobile_number align-middle white-space-nowrap text-right" ><a class="fw-bold text-1100" ><span class="badge bg-success">{{'Inactive'}} </span></a></td>
            @endif
            
                <td class="joined align-middle white-space-nowrap text-700 text-center">
                    <button type="button" class="btn btn-sm btn-info" data-bs-target="#open_brand_edit" data-bs-toggle="modal" onclick="brand_edit('{{ $item->id }}')"><i class="far fa-edit"></i></button>
                    @if ($item->flag == 1)
                    <button class="btn btn-sm btn-success" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $item->id }}','brand','activate')"><i class="fas fa-check"></i></button>
                    @else
                    <button class="btn btn-sm btn-warning" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $item->id }}','brand','deactivate')"><i class="fa fa-warning"></i></button>
                    @endif
                    <button class="btn btn-sm  btn-danger" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup('{{ $item->id }}','brand','delete')"><i class="fa fa-trash"></i></button>
                </td>
                
        </tr>
        @endforeach
    </tbody>
</table>