// Ajouter un article dans le localStorage
function addToLocalStorage(newArticle) {
    let articles = JSON.parse(localStorage.getItem('articles')) || [];
    // Vérifie si l'article existe déjà
    let existingArticle = articles.find(article => article.articleId === newArticle.articleId);
    if (existingArticle) {
        existingArticle.quantity += newArticle.quantity;
    } else {
        articles.push(newArticle);
    }
    localStorage.setItem('articles', JSON.stringify(articles));
}

// Décrémenter la quantité ou supprimer un article du localStorage
function removeOneQuantity(articleId) {
    let articles = JSON.parse(localStorage.getItem('articles')) || [];
    let articleIndex = articles.findIndex(article => article.articleId === articleId);
    if (articleIndex !== -1) {
        articles[articleIndex].quantity -= 1;
        // Si la quantité atteint zéro, supprimer l'article du tableau
        if (articles[articleIndex].quantity <= 0) {
            articles.splice(articleIndex, 1);
        }
        localStorage.setItem('articles', JSON.stringify(articles));
    } else {
        console.log("Article non trouvé");
    }
}

// Supprimer un article du localStorage
function removeArticle(articleId) {
    let articles = JSON.parse(localStorage.getItem('articles')) || [];
    // Supprimer l'article du tableau si il existe
    if (articles[articleIndex].quantity) {
        articles.splice(articleIndex, 1);
    }
    localStorage.setItem('articles', JSON.stringify(articles));
}

function addToCart(route) {
    fetch(route) // GET /cart/add/article/4
}
