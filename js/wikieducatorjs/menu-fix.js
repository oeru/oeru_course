jQuery(document).ready(
	function(){
	
		jQuery("li.sub-menu")
			.click(
				function(){
				
					elem =  jQuery(this)
								.children()
								.last();
				
					if(!jQuery(elem).is(":visible")){
					
						depth_class = jQuery(elem).attr("class").split("dropdown-menu ").join("");
					
						jQuery("." + depth_class)
							.each(
								function(index,value){
									jQuery(value)
										.css("display","none");
								}
							);
					
						jQuery(elem)
							.css("display","block");
										
					}else{
					
						if(jQuery(event.currentTarget).hasClass("menu-item-has-children")){
						
							jQuery(elem)
								.css("display","none");
								
						}
						
					}
					
					event.stopPropagation();
					
				}
				
			);
			
		jQuery("li.parent-menu")
			.click(
				function(event){
					
					elem =  jQuery(this)
								.children()
								.last();
				
					if(!jQuery(elem).is(":visible")){
							
						list = Array();	
							
						jQuery("ul.dropdown-menu")
							.each(
								function(index,value){	
									if(jQuery(value).is(":visible")){									
										list.push(value);									
									}
								
								}
							);
							
						for(x in list){
							jQuery(list[x])
								.css("display", "none");
						}	
							
						jQuery(elem)
							.css("display","block");
										
					}else{
					
						if(jQuery(event.currentTarget).hasClass("sub-menu")){
						
							jQuery(elem)
								.css("display","none");
							
						}else{
							
							if(jQuery(event.currentTarget).hasClass("parent-menu")){
								
								if(jQuery(event.currentTarget).hasClass("menu-item-has-children")){
								
									jQuery(elem)
										.css("display","none");
										
								}
								
							}
							
						}
					
					}
					
				}					
					
			);
	
		
		jQuery(document)
			.click(
				function(event){
					console.log(event.currentTarget.activeElement);
					if(!jQuery(event.currentTarget.activeElement).hasClass("dropdown")){
						jQuery(".dropdown-menu")
							.each(
								function(index,value){
									jQuery(value)
										.css("display","none");
								}
							);
					}
				
				}
			);
	}
);