window.onload = function() {
	
	var todoList = document.querySelector(".todoList");
	var submitText = document.querySelector(".submitText");
	var li = document.querySelectorAll("li");
	var itemNumber = -1;
	
	submitText.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			if (submitText.value !== "") {
				show(submitText.value);
				submitText.value = "";
			}
		  }
	});
	
	function show(submitText) {
		
		itemNumber++;
		
		var li = document.createElement("li");
		
		var span = document.createElement("span");
		var nodeData = document.createTextNode(submitText);
		span.append(nodeData);
		span.setAttribute("class", "todoText");
		
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
		
		document.querySelector(".todoList").appendChild(li);
				
		var deleteButton = document.getElementsByClassName("deleteTodo")[itemNumber];
		var markButton = document.getElementsByClassName("markTodo")[itemNumber];
		var todoText = document.getElementsByClassName("todoText")[itemNumber];
		var list = todoList.childNodes[itemNumber + 1];
		
		deleteButton.addEventListener("click", function() {
			
			todoList.removeChild(list);
			
			itemNumber--;
		});
		
		markButton.addEventListener("click", function() {
						
			todoText.classList.toggle("text-line-thouugh");
			
		});
		
		todoText.addEventListener("dblclick", function() {
			
			var content = todoText.textContent;

			inputBox.setAttribute("value", content);
			inputBox.style.display = "inline";
			todoText.style.display = "none";
			
			inputBox.addEventListener("keyup", function(event) {
				if (event.keyCode === 13) {
					todoText.textContent = inputBox.value;
					if ( todoText.textContent == "" ) {
						todoList.removeChild(list);
						itemNumber--;
					} else {
						todoText.style.display = "inline";
						inputBox.style.display = "none";
					}
					
				}

			});
			
		});
		
	}
};