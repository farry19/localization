<form action="{{ url('/newsitems') }}" method="POST">
	{{ csrf_field() }}
	<select name="lang">
		<option value="en">English</option>
		<option value="ur">اردو</option>
	</select>
	<input type="text" name="name">
	<textarea name="body"></textarea>
	<button type="submit">Submit</button>
</form>