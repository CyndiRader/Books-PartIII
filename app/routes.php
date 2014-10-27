<?php

Route::model('book', 'Book');

Route::get('/', function() {
  return Redirect::to("books");
});

Route::get('books', function(){
  $books = Book::all();
  return View::make('books/index')
    ->with('books', $books);
});

Route::group(array('before'=>'auth'), function(){

Route::get('books/{book}/edit', function(Book $book) {
	return View::make('books.edit')
	->with('book', $book)
	->with('method', 'put');
});
Route::get('books/{book}/delete', function(Book $book) {
	return View::make('books.edit')
	->with('book', $book)
	->with('method', 'delete');
});

Route::put('books/{book}', function(Book $book) {
	$book->update(Input::all());
	return Redirect::to('books/' . $book->id)
	->with('message', 'Successfully updated book');
});

Route::delete('books/{book}', function(Book $book) {
  $book->delete();
  return Redirect::to('books')
    ->with('message', 'Successfully deleted book!');
});


Route::get('books/create', function() {
	$book = new Book;
	return View::make('books/edit')
	->with('book', $book)
	->with('method', 'post');
});

Route::post('books', function() {
	$book = Book::create(Input::all());
	return Redirect::to('books/' . $book->id)
	->with('message', 'Successfully created book');
});

Route::get('books/{id}', function($id) {
	$book = Book::find($id);
	return View::make('books.single')
	->with('book', $book);
});

});

Route::get('login', array('before'=>'guest', function(){
  return View::make('login');
}));

Route::post('login', function(){
  if(Auth::attempt(Input::only('username', 'password')))
    return Redirect::intended('/');
  else
    return Redirect::back()
      ->withInput()
      ->with('error', "Invalid credentials");
});

Route::get('logout', function(){
  Auth::logout();
  return Redirect::to('/');
});

