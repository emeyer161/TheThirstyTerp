import BaseStore from './BaseStore';
import { getById } from '../actions/PostActions';
import { getFirstPage } from '../actions/PostActions';
import _ from 'lodash';

class PostStore extends BaseStore {

	constructor(){
	    super();
	    
		this._posts = [];
		this._nextPageNum = 1;
		this._lastPage = false;
	}
	
	register(action){
		switch(action.type){
			// case "post.uploaded":
			// 	// Insert the action to upload the post here
			// 	this._posts.push(action.post);
			// 	this.emitChange();
			// 	break;
			
			case "posts.retrieved":
				// console.log('Post Retrieved from Dispatcher: ', action.posts);
				
				for(var i=0; i<action.posts.length; i++){
					this._posts.push(action.posts[i]);
				}
				this._sortPosts();
				
				action.page && (this._nextPageNum = action.page+1);
				
				if (action.lastPage){
					if (this._nextPageNum > action.lastPage){
						this._lastPage = true;
					}
				}
				
				this.emitChange();
				break;
			
			default:
				break;
		}
	}
	
	storeDidMount(){
		getFirstPage();
	}

	getAll(){
		return this._posts;
	}

	getPostById(id){
		var post;
        
        // Look for post in storage
		for(var i=0; i < this._posts.length; i++){
			if(this._posts[i].ID == id){
				post = this._posts[i];
			}
		}

		if(post){   // If post is stored
			return post;
		}
		else {      // If post isn't stored
			getById(id);
			return {};
		}
	}
	
	getNextPageNum(){
		return this._nextPageNum;
	}
	
	lastPage(){
		return this._lastPage;
	}
	
	_sortPosts(){
		// this.state._posts
		// _. USE LODASH to compare and sort this stuff.
	}
	
	_addPosts(){
		// handle adding posts
	}
	
}

export default new PostStore();