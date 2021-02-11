<h1>Новая заявка на сайте!</h1>
<p>
    Контакти клиента:<br>
    <strong>{{ $data['name'] ?? '' }}</strong>,<br>
    {{ $data['phone'] ?? '' }}<br>
    {{ $data['email'] ?? '' }}<br>
<p>
    <strong>Клиента интересует:</strong><br>
    @if (isset($data['take'])) Снять @endif
    @if (isset($data['hand'])) Сдать @endif
    @if (isset($data['buy'])) Купить @endif
    @if (isset($data['sell'])) Продать @endif
<p>
    @if (isset($data['type_object'])) <strong>Тип объекта:</strong>

        @if ($data['type_object'] == 0) Квартиры @endif
        @if ($data['type_object'] == 1) Жилые комплексы @endif
        @if ($data['type_object'] == 2) Дома @endif
        @if ($data['type_object'] == 3) Земли @endif
        @if ($data['type_object'] == 4) Коммерческая недвижимость @endif

    @endif
<p>

    @if (isset($data['price'])) <strong>Прайс:</strong>

        @if ($data['price'] == 0) до 100 000 @endif
        @if ($data['price'] == 1) от 100 000 до 500 000 @endif
        @if ($data['price'] == 2) от 500 000 до 1 000 000 @endif
        @if ($data['price'] == 3) от 1 000 000 до 5 000 000 @endif
        @if ($data['price'] == 4) от 5 000 000 @endif

    @endif
<p>


<div
    style="width: 100%; background: #0E1216 none repeat scroll 0 0;  padding: 20px; text-align: center; margin-top: 20px;">
    <table style="color: white; width: 100%;">
        <tr>
            <td>
                <img src="{{ asset('logo.png') }}" class="logo" alt="Logo">
            </td>
            <td>Офис в Москве<br>
                Москва, Знаменка д. 13, стр. 3
            </td>
            <td>
                Офис в Сочи<br>
                г. Сочи, Горького 53, ЦУМ 4-й этаж
            </td>
            <td> info@7realty.ru</td>
            <td> + 7 (985) 700-00-77</td>
        </tr>
    </table>
</div>
