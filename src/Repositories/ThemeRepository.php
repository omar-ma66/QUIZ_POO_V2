<?php
class ThemeRepository extends AbstractRepository
{

    private ThemeMapper $themeMapper;

    public function __construct()
    {
        parent::__construct("themes");
        $this->themeMapper = new ThemeMapper();
    }

    public function selectByName(string $themeName)
    {
        $smt =  $this->bdd->prepare("SELECT * FROM $this->tableName WHERE theme= :theme");
        $smt->bindParam(":theme", $themeName, PDO::PARAM_STR);
        $smt->execute();
        $theme = $smt->fetch(PDO::FETCH_ASSOC);
        if ($theme)
            return $this->themeMapper->mapToObjet($theme);
        else
            return null;
    }

    public function selectByID(int $id): ?Theme
    {
        $smt = $this->bdd->prepare("SELECT * FROM $this->tableName WHERE id= :id");
        $smt->execute([
            'id' => $id
        ]);
        $themeData = $smt->fetch(PDO::FETCH_ASSOC);
        if ($themeData) {
            return $this->themeMapper->mapToObjet($themeData);
        }
        return null;
    }

    public function selectAll(): ?Theme
    {
        $result = $this->bdd->query("SELECT * FROM $this->tableName ");

        $allThemes = $result->fetchAll(PDO::FETCH_NUM);

        if ($result->rowCount() > 0) {
            //   return new Theme($allThemes); 
            return new Theme(0, " ");
        }
        return null;
    }
    public function deleteByID(int $id) {}
    public function insert() {}
    public function updateByID() {}
}
