<h2>New Quote Request</h2>
<p><strong>Contact Person:</strong> {{ $quote->contact_person }}</p>
<p><strong>Company:</strong> {{ $quote->company_name ?: 'N/A' }}</p>
<p><strong>Email:</strong> {{ $quote->email }}</p>
<p><strong>Phone:</strong> {{ $quote->phone }}</p>
@if($quote->service)
<p><strong>Service:</strong> {{ $quote->service->title }}</p>
@endif
@if($quote->product)
<p><strong>Product:</strong> {{ $quote->product->title }}</p>
@endif
<p><strong>Message:</strong></p>
<p>{{ $quote->message }}</p>
