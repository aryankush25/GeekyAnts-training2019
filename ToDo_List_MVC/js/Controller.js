function Controller() {
	
	this.todoCollectionList = new TodoList();
	var self = this;
	
	document.querySelector(".input-form").addEventListener("submit", function(e) {
		e.preventDefault();
		var captionText = document.getElementsByClassName("submit-text")[0];
		if (captionText.value !== "") {
			self.todoCollectionList.addData(captionText.value, false);
			captionText.value = "";
			self.render();
		}
	});
	
	this.render = function() {
		
		console.log("Render Started");
		
		var list = document.querySelector(".todoList");
		list.innerHTML = "";
		
		if (this.todoCollectionList.todoCollection.length !== 0) {
		
			for (var i = 0; i < this.todoCollectionList.todoCollection.length; i++) {

				console.log("List Render Started");

				//console.log(this.todoCollectionList.caption(i));
				var li = document.createElement("li");

				var span = document.createElement("span");
				var str = this.todoCollectionList.caption(i);
				var nodeData = document.createTextNode(str);
				span.append(nodeData);
				span.setAttribute("class", "todoText");
				if (this.todoCollectionList.isCompleted(i) === true) {
					span.style.textDecoration = "line-through";
				} else {
					span.style.textDecoration = "none";
				}
				
				li.appendChild(span);

				var inputBox = document.createElement("input");
				inputBox.setAttribute("class", "inputBox");
				inputBox.setAttribute("type", "text");
				inputBox.style.display = "none";

				li.appendChild(inputBox);

				var button = document.createElement("button");
				var nodeData = document.createTextNode("Delete");
				button.append(nodeData);
				button.setAttribute("class", "deleteTodo");

				li.appendChild(button);

				var button = document.createElement("button");
				var nodeData = document.createTextNode("Mark Done");
				button.append(nodeData);
				button.setAttribute("class", "markTodo");

				li.appendChild(button);
				list.appendChild(li);

				var deleteButton = document.getElementsByClassName("deleteTodo")[i];
				var markButton = document.getElementsByClassName("markTodo")[i];
				var todoText = document.getElementsByClassName("todoText")[i];
				var inputBox = document.getElementsByClassName("inputBox")[i];

//				console.log(deleteButton);
//				console.log(markButton);
//				console.log(todoText);

				deleteButton.addEventListener("click", function(index) {
					self.todoCollectionList.removeData(index);
					self.render();
				}.bind(null, i));
	
				markButton.addEventListener("click", function(index) {
					self.todoCollectionList.toggle(index);
					self.render();
				}.bind(null, i));

				todoText.addEventListener("dblclick", function(index) {
					
					var todoText = document.getElementsByClassName("todoText")[index];
					var inputBox = document.getElementsByClassName("inputBox")[index];
					
					var content = self.todoCollectionList.caption(index);
		
					inputBox.setAttribute("value", content);
					inputBox.style.display = "inline";
					todoText.style.display = "none";
					
					inputBox.addEventListener("keyup", function(idx) {
						if (event.keyCode === 13) {
							if ( inputBox.value !== "" ) {
								console.log("Edited");
								self.todoCollectionList.edit(inputBox.value, idx);
								todoText.style.display = "inline";
								inputBox.style.display = "none";
								self.render();
							}
						}
		
					}.bind(null, index));
					
				}.bind(null, i));

			}
			
		}

	}
}