<ul>
	@foreach($newsitems as $item)
		<li>{{ $item->getTranslation('name', 'ur') }}</li>
		<!-- <li>{{ print_r($item->getTranslations()) }}</li> -->
	@endforeach
</ul>