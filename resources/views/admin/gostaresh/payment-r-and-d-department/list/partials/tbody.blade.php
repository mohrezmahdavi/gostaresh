<td>{{ $paymentRAndDDepartment?->province?->name . ' - ' . $paymentRAndDDepartment->county?->name }}
</td>
@if (filterCol('amount') == true)
<td>{{ number_format($paymentRAndDDepartment?->amount) }}</td>
@endif
@if (filterCol('year') == true)
<td>{{ $paymentRAndDDepartment?->year }}</td>
@endif