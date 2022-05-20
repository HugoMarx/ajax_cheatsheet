function updateHeadline(title, picture, content) {
	document.getElementById('headlineTitle').innerHTML = title;
	document.getElementById('headlinePicture').setAttribute('src', picture);
	document.getElementById('headlineContent').innerHTML = content;
}

document
	.getElementById('changeHeadlineButton')
	.addEventListener('click', function () {
		//TODO 1 : Get a random article
		fetch('http://localhost:8000/api/articles/random')
			.then(function (response) {
				return response.json();
			})
			.then(function (article) {
				updateHeadline(article.title, article.picture, article.content);
			});
	});

document
	.getElementById('searchHeadline')
	.addEventListener('input', function (e) {
		//Here we get the value typed in the input
		let search = e.target.value;
    let request = [];
		//console.log(search);
		//TODO 2 : Call the route 'api/articles/search' to get the list of the articles targeted by the search
		fetch('http://localhost:8000/api/articles/search?search=' + search)
			.then(function (response) {
				return response.json();
			})
			.then(function (articles) {
				console.log(articles);
        let resultList = document.querySelector('#resultList');
        resultList.innerHTML = '';
        for (i = 0 ; i < articles.length ; i++) {
          resultList.innerHTML += "<a href='/article?id="+ articles[i].id + "'><li>" + articles[i].title + "</li></a>";
        }
			});

    
	});
