<form method="GET" action="/Forms/searchKara.php">
    <ul>
        <li>Song name<input type="text" name="song_name"></input></li>
        <li>Source name<input type="text" name="source_name"></input></li>
        <li>Author name<input type="text" name="author_name"></input></li>
        <li class="custom-select">
            Language
            <select class="custom-select" name="language">
                <option value = "all">All</option>
                <option value = "jp">Japanese</option>
                <option value = "fr">French</option>
                <option value = "it">Italian</option>
                <option value = "ru">Russian</option>
            </select>
        </li>
        <li class="custom-select">
            Song Type
            <select class="custom-select" name="song_type">
                <option value = "all">All</option>
                <option value = "va">VA</option>
                <option value = "vo">VO</option>
                <option value = "amv">AMV</option>
                <option value = "cdg">CDG</option>
                <option value = "voca">Vocaloid</option>
                <option value = "autres">Autres</option>
            </select>
        </li>
        <li>
            Is new<br>
            <input type="radio" name="is_new" value="Indifferent" checked>Indifferent</input>
            <input type="radio" name="is_new" value="Yes">Yes</input>
            <input type="radio" name="is_new" value="No">No</input>
        </li>
    </ul>
    <button class="lebutton" type="submit">Search !</button>
</form>

<div id="resultList">
</div> 
