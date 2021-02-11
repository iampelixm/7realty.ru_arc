<h1>Новая заявка Сдать/Арендовать</h1>
<p>
    Контакти клиента:<br>
    <strong>{{ $data['name'] ?? '' }}</strong>,<br>
    {{ $data['phone'] ?? '' }}<br>
    {{ $data['email'] ?? '' }}<br>
<p>
    Пожелания клиента:<br>
    {{ $data['text'] ?? '' }}


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
