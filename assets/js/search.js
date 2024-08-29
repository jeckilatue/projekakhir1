function highlightText(query) {
    var containers = document.querySelectorAll(".container, .services, .slider-container");

    for (var i = 0; i < containers.length; i++) {
        var container = containers[i];
        var elements = container.querySelectorAll("div:not([class]), p, h1, h2, h3, h4, h5, h6, span, .services__desc");

        // Menghapus penyorotan sebelumnya
        var highlightedElements = container.getElementsByClassName("highlight");
        while (highlightedElements.length) {
            var element = highlightedElements[0];
            element.outerHTML = element.innerHTML;
        }

        // Melakukan penyorotan pada teks yang cocok dengan query
        if (query.length > 0) {
            var regex = new RegExp(query, "gi");
            for (var j = 0; j < elements.length; j++) {
                var element = elements[j];
                if (element.nodeName.toLowerCase() === "div" && element.hasChildNodes()) {
                    var childNodes = element.childNodes;
                    var text = "";
                    for (var k = 0; k < childNodes.length; k++) {
                        if (childNodes[k].nodeType === Node.TEXT_NODE) {
                            text += childNodes[k].textContent;
                        }
                    }
                } else {
                    var text = element.textContent || element.innerText; // Mengambil teks dari elemen
                }
                var matches = text.match(regex);
                if (matches) {
                    var highlightedText = text.replace(regex, "<span class='highlight'>$&</span>");
                    element.innerHTML = highlightedText;
                }
            }
        }
    }
}

// Sisanya sama seperti sebelumnya
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var searchResults = document.getElementById("search-results");
    var searchBtn = document.getElementById("searchBtn");
    var searchBar = document.getElementById("searchBar");
    var searchClose = document.getElementById("searchClose");

    var highlightedElements = [];
    var currentHighlightIndex = 0;

    searchBtn.addEventListener("click", function() {
        searchBar.classList.add("active");
        searchInput.focus();
    });

    searchClose.addEventListener("click", function() {
        searchBar.classList.remove("active");
        searchInput.value = "";
        searchResults.innerHTML = "";
        highlightText(""); // Menghapus penyorotan saat menutup pencarian
        highlightedElements = [];
        currentHighlightIndex = 0;
    });

    searchInput.addEventListener("input", function() {
        var query = searchInput.value;
        if (query.length > 0) {
            searchResults.innerHTML = "";
            highlightText(query);
            highlightedElements = Array.from(document.getElementsByClassName("highlight"));
            currentHighlightIndex = 0;
        } else {
            searchResults.innerHTML = "";
            highlightText(""); // Menghapus penyorotan saat input kosong
            highlightedElements = [];
            currentHighlightIndex = 0;
        }
    });

    searchInput.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            var query = searchInput.value;
            if (query.length > 0) {
                if (highlightedElements.length > 0) {
                    if (currentHighlightIndex >= highlightedElements.length) {
                        currentHighlightIndex = 0;
                    }
                    var element = highlightedElements[currentHighlightIndex];
                    element.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    element.classList.add("highlight-green");
                    currentHighlightIndex++;
                }
            }
        }
    });
});
