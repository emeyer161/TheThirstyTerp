import dispatcher from '../dispatcher';
import $ from 'jquery';
import PostStore from '../stores/PostStore';

export function getById(id){
    console.log(PostStore);
    var url = '/posts/' + id;
    
    $.getJSON(url, function(result){
        console.log('AJAX request: #',id);
        
		dispatcher.dispatch({
			type: "posts.retrieved",
			posts: [result],
			nextPage: false,
			lastPage: false
		});
    });
}

export function getFirstPage(){
    var url = 'posts/?page=1';
    
    $.getJSON(url, function(result){
        console.log('AJAX request: first page ');
        
		dispatcher.dispatch({
			type: "posts.retrieved",
			posts: result.data,
			page: result.current_page,
			lastPage: result.last_page
		});
    });
}

export function getNextPage(){
    var pageNum = PostStore.getNextPageNum();
    var url = 'posts/?page=' + pageNum;
    
    $.getJSON(url, function(result){
        console.log('AJAX request: page ', pageNum);
        
		dispatcher.dispatch({
			type: "posts.retrieved",
			posts: result.data,
			page: result.current_page,
			lastPage: result.last_page
		});
    });
}