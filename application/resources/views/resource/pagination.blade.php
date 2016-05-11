@if($data->lastPage() > 1)
    <nav style="text-align:center">
        <ul class="pagination">
            @if($data->currentPage() > 1)
                <li><a href="?page=1">First</a></li>
                <li><a href="?page={{ $data->currentPage()-1 }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                </a></li>
            @endif
            @if ($data->lastPage() <= 10)
                @for ($i = 1; $i < intval($data->lastPage())+1; $i++)
                    <li><a href="?page={{ $i }}">{{ $i }}</a></li>
                @endfor
            @else
                <!-- @for ($i = $data->currentPage()-4; $i < intval($data->currentPage())+4; $i++)
                    <li><a href="?page={{ $i }}">{{ $i }}</a></li>
                @endfor -->
            @endif
            @if($data->currentPage() < $data->lastPage())
                <li><a href="?page={{ $data->currentPage()+1 }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                </a></li>
                <li><a href="?page={{ $data->lastPage() }}">Last</a></li>
            @endif
        </ul>
    </nav>
@endif