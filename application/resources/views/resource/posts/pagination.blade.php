@if($data->lastPage() > 1)
    <nav style="text-align:center">
        <ul class="pagination">
            @if($data->currentPage() > 1)
                <li><a href="?page={{ $data->currentPage()-1 }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                </a></li>
            @endif
            @for ($i = 1; $i < intval($data->lastPage())+1; $i++)
                <li><a href="?page={{ $i }}">{{ $i }}</a></li>
            @endfor
            @if($data->currentPage() < $data->lastPage())
            <li><a href="?page={{ $data->currentPage()+1 }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
            </a></li>
            @endif
        </ul>
    </nav>
@endif