function TodoItem(caption, isCompleted) {
	this.caption = caption;
	this.isCompleted = isCompleted;
	
	this.toggle = function() {
		this.isCompleted = !this.isCompleted;
	}
}

function TodoList() {
	
	this.todoCollection = [];
	
	this.addData = function(caption, isCompleted) {
		var data = new TodoItem(caption, isCompleted);
		this.todoCollection.push(data);
	}
	
	this.removeData = function(index) {
		this.todoCollection.splice(index, 1);
	}
	
	this.toggle = function(index) {
		this.todoCollection[index].toggle();
	}
	
	this.edit = function(newCaption, index) {
		this.todoCollection[index].caption = newCaption;
	}
	
	this.caption = function(index) {
		return this.todoCollection[index].caption;
	}
	
	this.isCompleted = function(index) {
		return this.todoCollection[index].isCompleted;
	}
	
}