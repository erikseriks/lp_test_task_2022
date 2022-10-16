<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Address;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CvController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $items = Cv::paginate(15);

        return response()->json($items);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id): JsonResponse
    {
        $item = Cv::find($id);

        return response()->json(self::parseReturnItem($item));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $this->validate($request, self::validationRules());

        $data = $request->all();

        DB::beginTransaction();

        try {
            $item = Cv::create($data);

            array_map([$item->education(), 'create'], $data['education']);
            array_map([$item->skills(), 'create'], $data['skills']);
            array_map([$item->addresses(), 'create'], $data['addresses']);
            array_map([$item->languages(), 'create'], $data['languages']);

            foreach ($data['experience'] as $value) {
                $experience = $item->experience()->create($value);

                array_map([$experience->skills(), 'create'], $value['skills']);
            }

            $item->refresh();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }

        return response()->json(self::parseReturnItem($item));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, self::validationRules(true));

        $data = $request->all();

        $item = Cv::find($id);

        DB::beginTransaction();

        try {
            $item->fill($data);

            $item->save();

            self::updateRelated($item, 'education', Education::class, $data);
            self::updateRelated($item, 'experience', Experience::class, $data);
            self::updateRelated($item, 'skills', Skill::class, $data);
            self::updateRelated($item, 'addresses', Address::class, $data);
            self::updateRelated($item, 'languages', Language::class, $data);

            $item->refresh();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }

        return response()->json(self::parseReturnItem($item));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $item = Cv::find($id);

        $item->delete();

        return response()->json([]);
    }

    /**
     * @param Cv $item
     * @return array<int|string, mixed>
     */
    private static function parseReturnItem(Cv $item): array
    {
        return array_merge(
            $item->toArray(),
            [
                'education' => $item->education->all(),
                'skills' => $item->skills->all(),
                'addresses' => $item->addresses->all(),
                'languages' => $item->languages->all(),
                'experience' => array_map(
                    static function (Experience $exp): array {
                        return array_merge(
                            $exp->toArray(),
                            [
                                'skills' => $exp->skills->all(),
                            ]
                        );
                    },
                    $item->experience->all()
                ),
            ]
        );
    }

    /**
     * @param bool $edit
     * @return string[]
     */
    private static function validationRules(bool $edit = false)
    {
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255|email',
            'native_language' => 'max:255',
            'education' => 'array',
            'education.*' => 'array',
            'education.*.name' => 'required|max:255',
            'education.*.faculty' => 'max:255|nullable',
            'education.*.field' => 'max:255|nullable',
            'education.*.level' => 'max:255|nullable',
            'education.*.status' => 'max:255|nullable',
            'education.*.start_year' => 'required_with:start_month|digits:4|nullable',
            'education.*.start_month' => 'digits_between:1,12|integer|nullable',
            'education.*.end_year' => 'required_with:end_month|digits:4|nullable',
            'education.*.end_month' => 'digits_between:1,12|integer|nullable',
            'experience' => 'array',
            'experience.*' => 'array',
            'experience.*.name' => 'required|max:255',
            'experience.*.position' => 'max:255|nullable',
            'experience.*.work_load' => 'max:255|nullable',
            'experience.*.start_year' => 'required_with:start_month|digits:4|nullable',
            'experience.*.start_month' => 'digits_between:1,12|integer|nullable',
            'experience.*.end_year' => 'required_with:end_month|digits:4|nullable',
            'experience.*.end_month' => 'digits_between:1,12|integer|nullable',
            'experience.*.skills' => 'array',
            'experience.*.skills.*' => 'array',
            'experience.*.skills.*.type' => 'digits_between:1,4|integer',
            'experience.*.skills.*.description' => '',
            'skills' => 'array',
            'skills.*' => 'array',
            'skills.*.type' => 'digits_between:1,4|integer',
            'skills.*.description' => '',
            'addresses' => 'array',
            'addresses.*' => 'array',
            'addresses.*.country' => 'required|max:255',
            'addresses.*.index' => 'max:255|nullable',
            'addresses.*.city' => 'max:255|nullable',
            'addresses.*.city' => 'max:255|nullable',
            'addresses.*.street' => 'max:255|nullable',
            'addresses.*.number' => 'max:255|nullable',
            'languages' => 'array',
            'languages.*' => 'array',
            'languages.*.name' => 'required|max:255',
            'languages.*.listening' => 'digits_between:1,6|integer',
            'languages.*.reading' => 'digits_between:1,6|integer',
            'languages.*.talking' => 'digits_between:1,6|integer',
            'languages.*.writing' => 'digits_between:1,6|integer',
        ];

        if ($edit) {
            $rules = array_merge(
                $rules,
                [
                    'education.*.id' => 'integer',
                    'experience.*.id' => 'integer',
                    'experience.*.skills.*.id' => 'integer',
                    'skills.*.id' => 'integer',
                    'addresses.*.id' => 'integer',
                    'languages.*.id' => 'integer',
                ]
            );
        }

        return $rules;
    }

    /**
     * @param Model $item
     * @param string $key
     * @param string $class
     * @param array<int|string, mixed> $data
     * @return void
     */
    private static function updateRelated(
        Model $item,
        string $key,
        string $class,
        array $data
    ): void {
        $exitingRelatedItems = $item->$key->all();

        foreach ($data[$key] ?? [] as $rel) {
            $relatedItem = null;

            if (!isset($rel['id'])) {
                $relatedItem = $item->$key()->create($rel);
            } else {
                $exitingRelatedItems = array_filter(
                    $exitingRelatedItems,
                    static function (Model $item) use ($rel): bool {
                        return $item->id !== (int) $rel['id'];
                    }
                );

                $relatedItem = $class::find($rel['id']);

                $relatedItem->fill($rel);
                $relatedItem->save();
            }

            if ($class === Experience::class) {
                self::updateRelated($relatedItem, 'skills', Skill::class, $rel);
            }
        }

        foreach ($exitingRelatedItems as $deleteItem) {
            $deleteItem->delete();
        }
    }
}
