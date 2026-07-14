<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExampleCrud whereUpdatedAt($value)
 */
	class ExampleCrud extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingFour whereUuid($value)
 */
	class TestingFour extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingThree whereUuid($value)
 */
	class TestingThree extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestingTwo whereUuid($value)
 */
	class TestingTwo extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

